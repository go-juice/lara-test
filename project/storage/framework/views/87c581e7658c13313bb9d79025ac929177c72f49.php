<?php $__env->startSection('content'); ?>

    <h1 class="title"><?php echo e($project->title); ?></h1>

    <div class="content">
        <?php echo e($project->description); ?>

        <p>
            <a href="/projects/<?php echo e($project->id); ?>/edit">Edit</a>
        </p>
    </div>

    <?php if($project->tasks->count()): ?>
        <div class="box">
            <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <form method="POST" action="/tasks/<?php echo e($task->id); ?>">
                    <?php echo method_field('PATCH'); ?>
                    <?php echo csrf_field(); ?>
                    <label for="completed" class="checkbox <?php echo e($task->completed ? 'is-complete' : ''); ?>">
                        <input type="checkbox" name="completed" onChange="this.form.submit()" <?php echo e($task->completed ? 'checked' : ''); ?>>
                        <?php echo e($task->description); ?>

                    </label>
                </form>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    
    <form class="box" method="POST" action="/projects/<?php echo e($project->id); ?>/tasks">
        <?php echo csrf_field(); ?>
        <div class="field">
            <label class="label" for="description">New Task</label>
            <div class="control">

                <input type="text" class="input" name="description" placeholder="New Task" required>

            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>
    </form>
    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\project\resources\views/projects/show.blade.php ENDPATH**/ ?>