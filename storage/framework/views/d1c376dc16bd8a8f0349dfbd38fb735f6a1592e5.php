<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('icon/' . $icon)); ?>" type="image/x-icon">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo e(asset('ecommerce-template-tailwind-1-main/public')); ?>/assets/css/main.css">
    
    <?php if(isset($admin)): ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tailwind Starter Template - Night Admin Template: Tailwind Toolbox</title>
        <meta name="description" content="description here">
        <meta name="keywords" content="keywords,here">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
            integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
        
        <style>
            .bg-black-alt {
                background: #191919;
            }
        
            .text-black-alt {
                color: #191919;
            }
        
            .border-black-alt {
                border-color: #191919;
            }
        </style>
    <?php else: ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
                rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo e(asset('ecommerce-template-tailwind-1-main/public')); ?>/../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <?php endif; ?>

    <script>
        tailwind.config = {
            theme: {
                container: {
                    center: true,
                    screens: {
                        xl: '1170px',
                    },
                },
            }
        }
    </script>


    <?php echo \Livewire\Livewire::styles(); ?>

</head>

<body <?php if(isset($admin)): ?> class="bg-black-alt font-sans leading-normal tracking-normal" <?php endif; ?>>
    <?php if(isset($admin)): ?>
            <?php echo e($slot); ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('dashboard.layouts.footer')->html();
} elseif ($_instance->childHasBeenRendered('EtfJX5D')) {
    $componentId = $_instance->getRenderedChildComponentId('EtfJX5D');
    $componentTag = $_instance->getRenderedChildComponentTagName('EtfJX5D');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('EtfJX5D');
} else {
    $response = \Livewire\Livewire::mount('dashboard.layouts.footer');
    $html = $response->html();
    $_instance->logRenderedChild('EtfJX5D', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php else: ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('component.navbar')->html();
} elseif ($_instance->childHasBeenRendered('T8vbcxi')) {
    $componentId = $_instance->getRenderedChildComponentId('T8vbcxi');
    $componentTag = $_instance->getRenderedChildComponentTagName('T8vbcxi');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('T8vbcxi');
} else {
    $response = \Livewire\Livewire::mount('component.navbar');
    $html = $response->html();
    $_instance->logRenderedChild('T8vbcxi', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php echo e($slot); ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('component.footer')->html();
} elseif ($_instance->childHasBeenRendered('gI2j9Te')) {
    $componentId = $_instance->getRenderedChildComponentId('gI2j9Te');
    $componentTag = $_instance->getRenderedChildComponentTagName('gI2j9Te');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gI2j9Te');
} else {
    $response = \Livewire\Livewire::mount('component.footer');
    $html = $response->html();
    $_instance->logRenderedChild('gI2j9Te', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>

    <?php echo \Livewire\Livewire::scripts(); ?>

</body>

</html><?php /**PATH E:\New folder\Alkademi\Tugas-Akhir_Tall-Stack\Tugas-Akhir_Tall-Stack1\resources\views/layouts/app.blade.php ENDPATH**/ ?>