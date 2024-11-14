<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolution</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Sidebar and Main Content Container -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        <?php include './partials/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-10 max-w-5xl ml-56">
            <!-- Title -->
            <h2 class="text-2xl font-bold mb-4">Resolution</h2>

            <!-- Form Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <!-- Supplier and Description Section -->
                <div>
                    <label class="block text-lg font-medium text-gray-700 mb-2">Name of Supplier:</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
                </div>

                <div>
                    <label class="block text-lg font-medium text-gray-700 mb-2">Description of Goods/Service:</label>
                    <textarea rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"></textarea>
                </div>

                <!-- Amount in Words and Figures Section -->
                <div class="col-span-2">
                    <label class="block text-lg font-medium text-gray-700 mb-2">Total Amount in Words and Figures:</label>
                    <textarea rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"></textarea>
                </div>

                <!-- Whereas Section -->
                <h2 class="text-2xl font-semibold mt-6 mb-4 text-gray-800 col-span-2">Whereas:</h2>
                <div class="space-y-4 col-span-2">
                    <div class="space-y-2">
                        <textarea rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"></textarea>
                        <div class="flex space-x-4 mt-4">
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg w-full sm:w-auto">
                                ADD TEXT
                            </button>
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg w-full sm:w-auto">
                                ADD TABLE
                            </button>
                        </div>
                    </div>
                </div>

                <!-- It is hereby resolved that Section -->
                <h2 class="text-2xl font-semibold mt-6 mb-4 text-gray-800 col-span-2">It is hereby resolved that:</h2>
                <div class="space-y-4 col-span-2">
                    <div class="space-y-2">
                        <textarea rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"></textarea>
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg w-full sm:w-auto mt-4">
                            ADD TEXT
                        </button>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="mt-8 text-center col-span-2">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg w-full sm:w-auto">
                        SAVE
                    </button>
                </div>

            </div>
        </div>

    </div>

</body>
</html>