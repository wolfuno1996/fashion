<?php include('pages/header.php') ?>
<?php include('pages/Funtions.php') ?>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <h4 class="m-text14 p-b-7">
                        Categories
                    </h4>

                    <ul class="p-b-54">
                        <li class="p-t-4">
                            <?php if($category=='all'){?>
                            <a href="<?php echo base_url()."product/category/all"?>" class="s-text13 active1">
                                All
                            </a>
                            <?php } ?>
                            <?php if($category!='all'){?>
                            <a href="<?php echo base_url()."product/category/all"?>" class="s-text13">
                                All
                            </a>
                            <?php } ?>
                        </li>
                        <?php if(isset($total_category)){ foreach ($total_category as $each_category){  ?>
                        <li class="p-t-4">
                            <?php if($category=='all'){?>

                            <a href="<?php echo base_url() ?>product/category/<?php echo $each_category['name'] ?>" class="s-text13 ">
                                <?php echo $each_category['name'] ?>
                            </a>
                            <?php } ?>
                            <?php if($category!='all' && $category==$each_category['name']){?>

                                <a href="<?php echo base_url() ?>product/category/<?php echo $each_category['name'] ?>" class="s-text13 active1">
                                    <?php echo $each_category['name'] ?>
                                </a>
                            <?php } ?>
                            <?php if($category!='all' && $category!=$each_category['name']){?>

                                <a href="<?php echo base_url() ?>product/category/<?php echo $each_category['name'] ?>" class="s-text13">
                                    <?php echo $each_category['name'] ?>
                                </a>
                            <?php } ?>

                        </li>
                        <?php }} ?>

                    </ul>

                    <!--  -->
                    <h4 class="m-text14 p-b-32">
                        Filters
                    </h4>

                    <div class="filter-price p-t-22 p-b-50 bo3">
                        <div class="m-text15 p-b-17">
                            Price
                        </div>

                        <div class="wra-filter-bar">
                            <div id="filter-bar"></div>
                        </div>

                        <div class="flex-sb-m flex-w p-t-16">
                            <div class="w-size11">
                                <!-- Button -->

                            </div>

                            <div class="s-text3 p-t-10 p-b-10">
                                Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
                            </div>
                        </div>
                    </div>

                    <div class="filter-color p-t-22 p-b-50 bo3">
                        <div class="m-text15 p-b-12">
                            Color
                        </div>

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
                                <?php if(isset($category)){ ?>
                                <input type="hidden" id="category" value="<?php echo $category  ?>" >
                                <?php } ?>
                                <?php if(isset($sort)){ ?>
                                <input type="hidden" id="sort" value="<?php echo $sort?>" >
                                <?php } ?>
                                <input type="hidden" id="base_url" value="<?php echo base_url()  ?>" >
                            </li>
                        </ul>
                        <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4" id="filter-button" onclick="filterProduct()">
                            Filter
                        </button>
                    </div>

                    <div class="search-product pos-relative bo4 of-hidden">
                        <input class="s-text7 size6 p-l-23 p-r-50" id="search-product" type="text" value="" name="search-product" placeholder="Search Products...">

                        <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" id="search-button"  onclick="searchProduct()">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!--  -->
                <div class="flex-sb-m flex-w p-b-35">
                    <div class="flex-w"> <?php if(isset($limit)){ ?>
                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">

                            <select class="selection-2" id="selection-sort" name="sorting" onchange="sortProductWithKey(this)">
                                <option value="default-sort">Default Sorting</option>
                                <option value="price-asc">Price: low to high</option>
                                <option value="price-desc">Price: high to low</option>
                            </select>


                        </div>
                        <?php } ?>
                        <?php if(isset($price)){ ?>
                            <h5>Filter with Price :  <span style="color: red">'<?php echo $price?>'</span> and Color : <span style="color: red">'<?php echo $color?>'</span></h5><br>
                        <?php } ?>


                    </div>
                    <?php if(isset($limit)){ ?>
                    <span class="s-text8 p-t-5 p-b-5">
							Showing <?php echo $limit ?> of <?php echo $total_record ?> results
						</span>
                    <?php } ?>
                </div>
                <?php if(isset($key_word)){ ?>
                <h5>The result of <span style="color: red">'<?php echo $key_word ?>'</span></h5><br>
                <?php } ?>
                <!-- Product -->
                <div class="row">
                    <?php
                        foreach ($product as $item ){
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="<?php echo base_url()?>assets/images/products/<?php echo $item['img'] ?>" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="add_cart(<?php echo $item['id'] ?>)">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="<?php echo base_url()?>product/<?php echo utf8convert($item['name']); ?>-id=<?php echo $item['id'] ?>" class="block2-name dis-block s-text3 p-b-5">
                                    <?php echo $item['name'] ?>
                                </a>

                                <span class="block2-price m-text6 p-r-5">
										<?php echo $item['price'] ?>
									</span>
                            </div>
                        </div>
                    </div>

                    <?php
                    }
                    ?>

                    </div>


                <!-- Pagination -->
                <?php if(isset($total_page)){ ?>
                    <?php if($sort!='default-sort') { ?>
                <div class="pagination flex-m flex-w p-t-26">
                    <?php for($i=1;$i<=$total_page;$i++){ ?>
                        <?php if($current_page == $i){ ?>
                    <a href="<?php echo base_url().'product/category/'.$category.'?sort='.$sort.'&page='.$i ?>" class="item-pagination flex-c-m trans-0-4 active-pagination disabled"><?php echo $i ?></a>
                    <?php }?>
                        <?php if($current_page!=$i){ ?>
                    <a href="<?php echo base_url().'product/category/'.$category.'?sort='.$sort.'&page='.$i ?>" class="item-pagination flex-c-m trans-0-4"><?php echo $i ?></a>
                        <?php }}?>
                </div>
                <?php }?>
                    <?php if($sort=='default-sort') { ?>
                        <div class="pagination flex-m flex-w p-t-26">
                            <?php for($i=1;$i<=$total_page;$i++){ ?>
                                <?php if($current_page == $i){ ?>
                                    <a href="<?php echo base_url().'product/category/'.$category.'?page='.$i ?>" class="item-pagination flex-c-m trans-0-4 active-pagination disabled"><?php echo $i ?></a>
                                <?php }?>
                                <?php if($current_page!=$i){ ?>
                                    <a href="<?php echo base_url().'product/category/'.$category.'?page='.$i ?>" class="item-pagination flex-c-m trans-0-4"><?php echo $i ?></a>
                                <?php }}?>
                        </div>
                    <?php }?>
                <?php }?>
            </div>
        </div>
    </div>
</section>


<?php include('pages/footer.php') ?>