<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            <div class="form-group mt-30">
                <div class="col-autos">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                </div>
            </div>
            <button class="bbtns d-block mt-20 w-100">Subcribe</button>
        </div>

        <?php if(is_active_sidebar('category_widget')) : ?>
            <div class="single-sidebar-widget post-category-widget">
             <?php dynamic_sidebar('category_widget')  ?>
           </div>
        <?php endif; ?>
        <?php if(is_active_sidebar('post-sidebar')) : ?>
            <div class="single-sidebar-widget popular-post-widget">
             <?php dynamic_sidebar('post-sidebar')  ?>
           </div>
        <?php endif; ?>
        <?php if(is_active_sidebar('tag-sidebar')): ?>
            <div class="single-sidebar-widget tag_cloud_widget">
                <?php dynamic_sidebar('tag-sidebar') ?>
            </div>
        <?php endif;  ?>  
    </div>
</div>
</div>