<h1> Thêm danh mục</h1>

<form method="POST" action="<?php echo route('category.create');?>" >
    <div>
        <input type="text" class="category_name" name="name_category" placeholder="Tên danh mục"
        value="<?php echo old('name_category')?>">
    </div>
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <button type="submit">Thêm</button>
</form>
