<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div class="grid h-screen place-items-center bg-gray-300">
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-4xl font-semibold animate-pulse flex text-red-800">Love calculator ❤️!</h1>
        </div>
        <div class="w-full max-w-xs">
            <form action="" method="post" class="bg-white shadow-md rounded-2xl px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label for="name1" id="name1" class="block text-gray-700 text-sm font-bold mb-2">
                      Name 1:
                    </label>
                    <input id="name1-input" type="text" name="name1" required class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-6">
                    <label for="name2" id="name2" class="block text-gray-700 text-sm font-bold mb-2">
                        Name 2:
                    </label>
                    <input id="name2-input" type="text" name="name2" required class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex flex-col justify-center items-center">
                    <button name="submit" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-3xl">
                        Calculate!
                    </button>
                </div>
            </form>

            <div class="flex flex-col justify-center items-center">
                <?php

                    require 'loveCalculator.php';

                ?>
            </div>
        </div>
    </div>
</body>
</html>