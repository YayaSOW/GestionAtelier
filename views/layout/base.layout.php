<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Atelier</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-100 h-screen flex">
<aside class="w-64 bg-white shadow-md flex flex-col justify-between">
    <div class="flex items-center px-4 pt-2">
        <button class="text-gray-500 hover:text-gray-600 focus:outline-none">
            <i class="lni lni-grid-alt"></i>
        </button>
        <div class="ml-2 font-bold">Gestion Atelier</div>
    </div>
    <div class="px-4 mb-4 border-b border-gray-300">
        <div class="flex items-center ml-20  pb-2">
            <button class="text-gray-500 hover:text-gray-600 focus:outline-none">
                | <i class="fa-solid fa-street-view"></i>
            </button>
            <div class="ml-2 font-bold">Admin</div>
        </div>
    </div>
    <ul class="">
        <li class="py-2 px-4 hover:bg-gray-200">
            <a href="<?= WEBROOT ?>/?controller=article&action=liste-article" class="flex items-center text-gray-600">
                <i class="fa-solid fa-list mr-2"></i>
                <span>Lister Article</span>
                <!-- <input type="text" class="hidden" name="action" value="liste-article"> -->
            </a>
        </li>
        <li class="py-2 px-4 hover:bg-gray-200">
            <a href="<?= WEBROOT ?>/?controller=type&action=liste-type" class="flex items-center text-gray-600">
                <i class="fa-solid fa-network-wired mr-2"></i>
                <span>Lister Type</span>
            </a>
        </li>
        <li class="py-2 px-4 hover:bg-gray-200">
            <a href="<?=WEBROOT?>/?controller=categorie&action=liste-categorie" class="flex items-center text-gray-600">
                <i class="fa-solid fa-table mr-2"></i>
                <span>Lister Categorie</span>
            </a>
        </li>
        <li class="py-2 px-4 hover:bg-gray-200 hidden">
            <a href="#" class="flex items-center text-gray-600">
                <i class="lni lni-layout mr-2"></i>
                <span>Multi Level</span>
            </a>
        </li>
        <li class="py-2 px-4 hover:bg-gray-200 hidden">
            <a href="#" class="flex items-center text-gray-600">
                <i class="lni lni-popup mr-2"></i>
                <span>Notification</span>
            </a>
        </li>
        <li class="py-2 px-4 hover:bg-gray-200 hidden">
            <a href="#" class="flex items-center text-gray-600">
                <i class="lni lni-cog mr-2"></i>
                <span>Setting</span>
            </a>
        </li>
    </ul>
    <div class="px-4 py-2 mt-auto mb-5">
        <a href="#" class="flex items-center text-gray-600">
            <i class="lni lni-exit mr-2"></i>
            <span>Se Deconecter</span>
        </a>
    </div>
</aside>
    <?php
    echo $contentView;
    ?>
    <script src="script.js"></script>
</body>

</html>