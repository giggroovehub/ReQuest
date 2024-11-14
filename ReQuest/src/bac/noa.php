<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice of Award</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Sidebar and Main Content Container -->
    <div class="flex h-screen">
        <?php include './partials/sidebar.php'; ?>


    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">NOTICE OF AWARD</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name of the Authorized Representative:</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Designation:</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Company Name:</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Project Title:</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Contract Amount in Words:</label>
                <textarea rows="3" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Contract Amount in Figures:</label>
                <input type="number" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">PhilGEPS Reference Number:</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + ADD SIGNATURE
                </button>
            </div>
        </div>

        <!-- Save Button -->
        <div class="mt-8">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                SAVE
            </button>
        </div>



    </div>

</body>
</html>
