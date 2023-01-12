@extends('app')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品情報編集画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/products') }}">戻る</a>
        </div>
    </div>
</div>
 
<div style="text-align:right;">
 <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
     <div class="row">
       <div class="col-12 mb-2 mt-2">
            <div class="form-group" style="text-align:left">
               <label>【商品情報ID】</label> {{ $product->id }}              
            </div>
       </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group" style="text-align:left">
            <label>【商品名】</label>              
                <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" placeholder="商品名">
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group" style="text-align:left">
            <label>【メーカー名】</label>              
                <select name="company_id" class="form-select">
                    <option>メーカー名を選択してください</otion>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}"@if($company-> id==$product-> company_id) selected @endif>{{ $company->company_name }}</otion>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group" style="text-align:left">
            <label>【価　格】</label>              
                <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="価格">
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group" style="text-align:left">
            <label>【在庫数】</label>              
                <input type="text" name="stock" value="{{ $product->stock }}" class="form-control" placeholder="在庫">
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group" style="text-align:left">
            <label>【コメント】</label>              
            <textarea class="form-control" style="height:100px" name="comment" placeholder="コメント">{{ $product->comment }}</textarea>
            </div>
        </div>
        <div class="form-group" style="text-align:left" >
        <label>【商品画像】</label>              
            <img src="{{ asset($product->img_path) }}" width="100" height="80">
            <input type="file" name="image">
        </div>

        <div class="col-12 mb-2 mt-2">
            <button type="submit" class="btn btn-primary w-100">更新</button>
        </div>
    </div>      
 </form>
</div>
@endsection