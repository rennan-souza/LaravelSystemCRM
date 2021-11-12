<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function listAction() {

    $products = Product::with('category')->paginate(5);

    return view('products/only_list', [
      'products' => $products
    ]);
  }

  public function listView() {
    return view('products/list');
  }

  public function storeView() {
    $categories = Category::all();
    return view('products/register', [
      'categories' => $categories,
    ]);
  }

  public function storeAction(Request $request) {

    $data = $request->only([
      'image',
      'name',
      'description',
      'category',
      'price',
      'amount',
    ]);

    $validator = Validator::make($data, [
      'image' => ['required', 'mimes:jpg,png,jpeg'],
      'name' => ['required', 'string', 'max:255'],
      'description' => ['required'],
      'category' => ['required'],
      'price' => ['required'],
      'amount' => ['required', 'numeric', 'min:0'],
    ]);

    if ($validator->fails()) {
      return redirect('produtos/cadastrar')
        ->withErrors($validator)
        ->withInput();
    }

    $replacedDotPrice = Str::replace('.', '', $data['price']);
    $priceFormated = Str::replace(',', '.', $replacedDotPrice);

    $image = $request->file('image');
    $imageName = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/assets/productsImages');
    $image->move($destinationPath, $imageName);

    $product = new Product;
    $product->image = $imageName;
    $product->name = $data['name'];
    $product->description = $data['description'];
    $product->category_id = $data['category'];
    $product->price = $priceFormated;
    $product->amount = $data['amount'];
    $product->save();

    return redirect('/produtos')
      ->with('success', 'Produto cadastrado com sucesso');
      
  }

  public function editView($id) {

    $product = Product::find($id);

    if (!$product) {
      return redirect('/produtos');
    }

    $categories = Category::all();
    
    return view('products/edit', [
      'product' => $product,
      'categories' => $categories,
    ]);
  }

  public function editAction(Request $request) {

    $data = $request->only([
      'id',
      'name',
      'description',
      'category',
      'price',
      'amount',
    ]);

    $product = Product::find($data['id']);

    if (!$product) {
      return redirect('/produtos');
    }

    $validator = Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'description' => ['required'],
      'category' => ['required'],
      'price' => ['required'],
      'amount' => ['required', 'numeric', 'min:0'],
    ]);

    if ($validator->fails()) {
      return redirect('produtos/editar/' . $data['id'])
        ->withErrors($validator)
        ->withInput();
    }

    if ($request->file('image')) {

      $validatorImage = Validator::make($request->all(), [
        'photo' => ['mimes:png,jpg,jpeg']
      ]);

      if ($validatorImage->fails()) {
        return redirect('produtos/editar/' . $data['id'])
          ->withErrors($validator)
          ->withInput();
      }

      if($product->image) {
        $imageDelete = public_path('assets/productsImages/'.$product->image);
        unlink($imageDelete);
      }

      $image = $request->file('image');
      $imageName = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/assets/productsImages');
      $image->move($destinationPath, $imageName);

    }

    $replacedDotPrice = Str::replace('.', '', $data['price']);
    $priceFormated = Str::replace(',', '.', $replacedDotPrice);

    $product->image = isset($imageName) ? $imageName : $product->image;
    $product->name = $data['name'];
    $product->description = $data['description'];
    $product->category_id = $data['category'];
    $product->price = $priceFormated;
    $product->amount = $data['amount'];
    $product->save();

    return redirect('/produtos')
      ->with('success', 'Produto editado com sucesso');
  }

  public function deleteView($id) {

    $product = Product::find($id);

    if (!$product) {
      return redirect('/produtos');
    }

    return view('products/delete', [
      'product' => $product
    ]);
  }

  public function deleteAction($id) {
    
    $product = Product::find($id);

    if (!$product) {
      return redirect('/produtos');
    }

    if($product->image) {
      $imageDelete = public_path('assets/productsImages/'.$product->image);
      unlink($imageDelete);
    }

    Product::find($product->id)->delete();
    
    return redirect('/produtos')
      ->with('success', 'Produto excluído com sucesso');
  }
}
