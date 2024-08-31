<h1> Thêm File</h1>

<form method="POST" action="<?php echo route('category.file');?>" enctype="multipart/form-data" >
    <div>
        <input type="file" class="file" name="file" placeholder="Select file"
        >
    </div>
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <button type="submit">Thêm</button>
</form>

