<div class="form-group">
    <label class="control-label"><?php echo e(trans('plugins/blog::base.number_posts_per_page')); ?></label>
    <input type="number" name="paginate" class="form-control" value="<?php echo e(theme_option('number_of_posts_in_a_category', 12)); ?>" data-shortcode-attribute="attribute" placeholder="<?php echo e(trans('plugins/blog::base.number_posts_per_page')); ?>">
</div>
<?php /**PATH /var/www/etic_mart/platform/plugins/blog/resources/views//partials/posts-short-code-admin-config.blade.php ENDPATH**/ ?>