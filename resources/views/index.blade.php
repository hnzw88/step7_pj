@extends('app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">商品情報一覧画面</h2>
            </div>
            <div class="text-right">
            <a class="btn btn-success" href="{{ route('product.create') }}">新規登録</a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- 検索フォーム -->
        <div class="col-sm">
            <form id="js-form" method="GET" action="{{ route('product.index') }}">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">商品名</label>
                    <!--キーワード検索-->
                    <div class="col-sm-5">
                        <input type="text" name="keyword" value="{{ $keyword ?? '' }}" id="search_keyword">
                    </div>
                    <div class="col-sm-auto">
                        <button type="button" class="btn btn-primary " id="search_button">検索</button>
                    </div>
                </div>
                <!--プルダウン検索-->
                <div class="form-group row">
                    <label class="col-sm-2">メーカー名</label>
                    <div class="col-sm-3">
                        <select name="company_name" class="form-control" value="">
                            <option value="">未選択</option>

                            @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

     <!-- フラッシュメッセージ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
            @if (session('flash_message'))
                $(function () {
                        toastr.success('{{ session('flash_message') }}');
                });
            @endif
    </script>
    <!-- フラッシュメッセージ -->

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
        </tr>

        @foreach ($products as $product)
        <tr>
            <td style="text-align:right">{{ $product->id }}</td>
            <td style="text-align:center"><img src="{{ asset($product->img_path) }}" width="70" height="50"></td>
            <td>{{ $product->product_name }}</td>
            <td style="text-align:right">{{ $product->price }}円</td>
            <td style="text-align:right">{{ $product->stock }}</td>
            <td>{{ $product->company_id }}</td>
            <td style="text-align:center">
            <a class="btn btn-primary" href="{{ route('product.show',$product->id) }}">詳細</a>
            </td>
            <td style=”text-align:center”>
            <form action="{{ route('product.destroy',$product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $products->links() }}
    
@endsection