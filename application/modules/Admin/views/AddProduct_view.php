<?php include('pages/admin/header.php') ?>
    <div class="col-md-8 offset-2">
        <div class="form-group row">
            <label for="example-text-input" class="col-4 col-form-label">Tên sản phẩm</label>
            <div class="col-8">
                <input class="form-control" type="text"  id="example-text-input" placeholder="Mời bạn nhập tên sản phẩm" aria-invalid="false" style="">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-4 col-form-label">Hãng sản xuất</label>
            <div class="col-8">
                <input class="form-control" type="text" id="example-text-input" placeholder="Mời bạn nhập tên hãng sản xuất" aria-invalid="false">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-4 col-form-label">Loại sản phẩm</label>

            <div class="col-8">

                <select required class="form-control" id="sel1" naria-invalid="false">
                    <option value="">Xin mời bạn chọn loại sản phẩm</option>
                    <?php foreach ($category as $item) { ?>
                         <option value="<?php echo $item['name']; ?>"><?php echo $item['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-4 col-form-label">Màu sản phẩm</label>

            <div class="col-8">

                <ul class="flex-w">
                    <li class="m-r-10">
                        <input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="Blue">
                        <label class="color-filter color-filter1" for="color-filter1"></label>
                    </li>

                    <li class="m-r-10">
                        <input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="Blue Navy">
                        <label class="color-filter color-filter2" for="color-filter2"></label>
                    </li>

                    <li class="m-r-10">
                        <input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="Orange">
                        <label class="color-filter color-filter3" for="color-filter3"></label>
                    </li>

                    <li class="m-r-10">
                        <input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="Red">
                        <label class="color-filter color-filter4" for="color-filter4"></label>
                    </li>

                    <li class="m-r-10">
                        <input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="Brown">
                        <label class="color-filter color-filter5" for="color-filter5"></label>
                    </li>

                    <li class="m-r-10">
                        <input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="Black">
                        <label class="color-filter color-filter6" for="color-filter6"></label>
                    </li>

                    <li class="m-r-10">
                        <input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="Gray">
                        <label class="color-filter color-filter7" for="color-filter7"></label>
                        <input type="hidden" id="category" value="all">
                        <input type="hidden" id="sort" value="default-sort">
                        <input type="hidden" id="base_url" value="http://fashion.local/">
                    </li>
                </ul>
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-4 col-form-label">Hình ảnh</label>
            <div class="col-5" >
                <div class="box-inner" style="margin-bottom:4%;">

                    <div class="box-content">
                        <div class="row" style="margin:1%;">
                            <div class="col-md-12">
                                <p>
                                    <label for="upload" class="btn btn-success">
                                        <i class="fa fa-arrow-up"></i>
                                        Tải ảnh lên
                                    </label>
                                    <input id="upload" style="display:none;" multiple type="file" file-input="files" class="input-xlarge">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-inner" aria-hidden="true">
                    <div class="box-content">
                        <div class="row" style="margin:1%; ">
                            <div class="col-md-5 left">
                                <h6 class="ng-binding">Name: </h6>
                            </div>
                            <div class="col-md-4 left">
                                <h6 class="ng-binding">Size:  KB</h6>
                            </div>
                            <div class="col-md-3 bottom">
                                <h6 class="ng-binding">Type:  </h6>
                            </div>
                        </div>

                        <div class="row" style="margin:1%;">
                            <div class="col-md-8">
                                <p>
                                    <img class="img-thumbnail" height="139" width="97">
                                </p>
                            </div>
                            <div class="row" style="margin:1%;">
                                <div class="col-md-4">
                                    <button class="btn btn-info">
                                        <i class="fa fa-paper-plane"></i>
                                        Upload
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-4 col-form-label">Giá</label>
            <div class="col-8">
                <input class="form-control" type="text" id="example-text-input" placeholder="Mời bạn nhập giá sản phẩm" aria-invalid="false">
                *đơn vị $*
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Nội dung</label>
        </div>


    </div>

<?php include('pages/admin/footer.php') ?>