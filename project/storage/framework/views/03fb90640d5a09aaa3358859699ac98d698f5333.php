<?php $__env->startSection('content'); ?>
    <h1 class="title">Create a New Project</h1>

    <form method="POST" action="/projects">
    <?php echo e(csrf_field()); ?>

        <div class="field">
            <label class="label" for="title">Project Title</label>
            <div class="control">
                <input type="text" class="input" <?php echo e($errors->has('title') ? 'is-danger' : ''); ?>name="title" required value="<?php echo e(old('title')); ?>">
            </div>
        </div>
        <div class="field">
            <label for="description" class="label">Project Description</label>
            <div>
                <textarea name="description" class="textarea" required <?php echo e($errors->has('description') ? 'is-danger' : ''); ?> value="<?php echo e(old('title')); ?>"></textarea>
            </div>
        </div>
        <div class="field">
            <button type="submit" class="button is-link">Create Project</button>
        </div>

        <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\project\resources\views/projects/create.blade.php ENDPATH**/ ?>