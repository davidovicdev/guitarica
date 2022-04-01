<aside class="col-lg-3 order-lg-first">
    <div class="sidebar sidebar-shop">
        <div class="widget widget-clean">
            <label>Filters:</label>
        </div><!-- End .widget widget-clean -->

        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                    Category
                </a>
            </h3><!-- End .widget-title -->

            <div class="collapse show" id="widget-1">
                <div class="widget-body">
                    <div class="filter-items filter-items-count">
                        @foreach ($categories as $category)
                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="categories" id="cat-{{$category->id}}" value="{{$category->name}}">
                                <label class="custom-control-label" for="cat-{{$category->id}}">{{$category->name}}</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->
                        @endforeach
                        
                    </div><!-- End .filter-items -->
                </div><!-- End .widget-body -->
            </div><!-- End .collapse -->
        </div><!-- End .widget -->

        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                    Brand
                </a>
            </h3><!-- End .widget-title -->

            <div class="collapse show" id="widget-4">
                <div class="widget-body">
                    <div class="filter-items">
                        @foreach ($brands as $brand)
                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name='brands' id="brand-{{$brand->id}}" value="{{$brand->name}}">
                                <label class="custom-control-label" for="brand-{{$brand->id}}">{{$brand->name}}</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->
                        @endforeach
                       
                    </div><!-- End .filter-items -->
                </div><!-- End .widget-body -->
            </div><!-- End .collapse -->
        </div><!-- End .widget -->

      
    </div><!-- End .sidebar sidebar-shop -->
</aside><!-- End .col-lg-3 -->