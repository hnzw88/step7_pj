<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select([
            'p.id',
            'p.product_name',
            'p.price',
            'p.stock',
            'c.company_name as company_id',
            ])
            -> from('products as p')
            -> join('companies as c', function($join) {
            $join-> on('p.company_id', '=', 'c.id');
            })
            -> orderBy('p.id', 'DESC')
            -> paginate(5);
        
        return view('index', compact('products'))
        -> with('page_id', request()-> page)
        -> with('i', (request()-> input('page', 1) - 1) * 5);


        //検索機能
        $companies = Company::all();

        //入力される値nameの定義
        $keyword = $request->input('keyword'); //商品名
        $company_name = $request->input('company_name'); //メーカー名

        //queryビルダ
        $query = Product::query();

        //キーワード検索機能
        if (!empty($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }

        //プルダウン検索機能
        if (isset($company_name)) {
            $query->where('company_id', $company_name);
        }

        $products = $query->get();
        return view('products.index', ['companies' => $companies], compact('products', 'keyword', 'company_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('create')
        -> with('companies',$companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $img_path = $request->file('image')->store('public/images/');

        //値の登録
        $product-> product_name = $request-> product_name;
        $product-> company_id = $request-> company_id;
        $product-> price = $request-> price;
        $product-> stock = $request-> stock;
        $product-> comment = $request-> comment;
        $product-> img_path = basename($img_path);
        //保存
        $product-> save();

        return redirect()->route('products.index')
        -> with('flash_message','商品を登録しました');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $companies = Company::all();
        return view('show', compact('product'))
        -> with('page_id', request()-> page_id)
        -> with('companies', $companies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $companies = Company::all();
        return view('edit', compact('product'))
        -> with('companies', $companies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = new Product();

        $img_path = $request-> file('image')->store('public/images/');

        //値の登録
        $product-> product_name = $request-> product_name;
        $product-> company_id = $request-> company_id;
        $product-> price = $request-> price;
        $product-> stock = $request-> stock;
        $product-> comment = $request-> comment;
        $product-> img_path = basename($img_path);
        //保存
        $product-> save();

        return redirect()-> route('products.index')
        -> with('flash_message','商品を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product-> delete();
        return redirect()-> route('products.index')
        -> with('flash_message',$product-> product_name.'を削除しました');
    }
}