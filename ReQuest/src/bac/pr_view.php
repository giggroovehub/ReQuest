<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Request</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-relaxed tracking-wide">
    <!-- Main container with flex layout -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <?php include './partials/sidebar.php'; ?>

        <!-- Main content -->
        <div class="flex-1 bg-white shadow-xl rounded-lg p-8 ml-1">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-semibold text-gray-800">Purchase Request</h2>
                <div class="flex gap-4">
                    <!-- Edit Button with Icon -->
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md text-lg hover:bg-blue-600 focus:outline-none flex items-center gap-2">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <!-- Download Button with Icon -->
                    <button class="bg-green-500 text-white px-4 py-2 rounded-md text-lg hover:bg-green-600 focus:outline-none flex items-center gap-2">
                        <i class="fas fa-download"></i> Download
                    </button>
                </div>
            </div>

            <!-- Basic Information -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                <div>
                    <label for="department" class="text-sm font-medium text-gray-600">Department:</label>
                    <input type="text" id="department" class="mt-1 border border-gray-300 rounded-md p-3 w-full" />
                </div>
                <div>
                    <label for="pr_no" class="text-sm font-medium text-gray-600">PR No.:</label>
                    <input type="text" id="pr_no" class="mt-1 border border-gray-300 rounded-md p-3 w-full" />
                </div>
                <div>
                    <label for="section" class="text-sm font-medium text-gray-600">Section:</label>
                    <input type="text" id="section" class="mt-1 border border-gray-300 rounded-md p-3 w-full" />
                </div>
                <div>
                    <label for="sai_no" class="text-sm font-medium text-gray-600">SAI No.:</label>
                    <input type="text" id="sai_no" class="mt-1 border border-gray-300 rounded-md p-3 w-full" />
                </div>
            </div>

            <!-- Itemized Table -->
            <div class="overflow-x-auto mb-8">
                <table class="w-full table-auto border-collapse rounded-lg shadow-md bg-white">
                    <thead class="bg-gray-100">
                        <tr class="text-left text-sm text-gray-600">
                            <th class="px-4 py-3 border-b border-gray-300">Item No.</th>
                            <th class="px-4 py-3 border-b border-gray-300">Unit</th>
                            <th class="px-4 py-3 border-b border-gray-300">Item Description</th>
                            <th class="px-4 py-3 border-b border-gray-300">Quantity</th>
                            <th class="px-4 py-3 border-b border-gray-300">Unit Cost</th>
                            <th class="px-4 py-3 border-b border-gray-300">Total Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-3"><input type="text" class="border border-gray-300 rounded-md p-2 w-full" /></td>
                            <td class="px-4 py-3"><input type="text" class="border border-gray-300 rounded-md p-2 w-full" /></td>
                            <td class="px-4 py-3"><input type="text" class="border border-gray-300 rounded-md p-2 w-full" /></td>
                            <td class="px-4 py-3"><input type="number" class="border border-gray-300 rounded-md p-2 w-full" /></td>
                            <td class="px-4 py-3"><input type="number" class="border border-gray-300 rounded-md p-2 w-full" /></td>
                            <td class="px-4 py-3"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-100">
                            <td colspan="5" class="text-right px-4 py-3 border-t border-gray-300">TOTAL AMOUNT:</td>
                            <td class="px-4 py-3 border-t border-gray-300"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Additional Information -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                <div>
                    <label for="purpose" class="text-sm font-medium text-gray-600">Purpose:</label>
                    <textarea id="purpose" class="mt-1 border border-gray-300 rounded-md p-3 w-full h-32"></textarea>
                </div>
                <div>
                    <label for="requested_by" class="text-sm font-medium text-gray-600">Requested by:</label>
                    <input type="text" id="requested_by" class="mt-1 border border-gray-300 rounded-md p-3 w-full" />
                </div>
                <div>
                    <label for="approved_by" class="text-sm font-medium text-gray-600">Approved by:</label>
                    <input type="text" id="approved_by" class="mt-1 border border-gray-300 rounded-md p-3 w-full" />
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4">
                <button class="bg-blue-500 text-white px-6 py-2 rounded-md text-lg hover:bg-blue-600 focus:outline-none">Save</button>
                <button class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md text-lg hover:bg-gray-400 focus:outline-none">Cancel</button>
            </div>
        </div>
    </div>
</body>
</html>
