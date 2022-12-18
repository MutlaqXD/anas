@csrf
<div class="form-group row">
    <div class="col-6">
        <input name="name" type="text" @isset($book) value="{{$book->name}}" @endisset class="form-control" placeholder="اسم الكتاب" required>

    </div>

</div>


<div class="col-6" style="margin-top: 25px">
    <input name="price" type="text" @isset($book) value="{{$book->price}}" @endisset class="form-control" id="" placeholder="السعر" required>

</div>



<div class="col-6 form-group">
    <br>
    <textarea name="description" @isset($book) value="{{$book->description}}" @endisset class="form-control" id="" rows="" placeholder="وصف مختصر "
              required></textarea>

</div>



<div class="col-6">
    <button type="submit" name="add" class="btn btn-md btn-success">إرسال</button>
</div>
