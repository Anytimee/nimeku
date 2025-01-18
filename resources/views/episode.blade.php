<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Episode Stream</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-8">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">Episode Stream</h1>

        <div class="text-center mb-4">
            <input type="text" id="episode-id" class="p-2 border border-gray-300 rounded" placeholder="Enter Episode ID">
            <button id="fetch-button" class="bg-blue-500 text-white p-2 rounded mt-2">Fetch Episode Stream</button>
        </div>

        <div id="episode-data" class="bg-white p-6 rounded shadow-lg mt-4 hidden">
            <h2 class="text-2xl font-semibold mb-4">Episode Stream Data</h2>
            <pre id="episode-info" class="whitespace-pre-wrap bg-gray-200 p-4 rounded"></pre>
        </div>
    </div>

    <script>
        document.getElementById('fetch-button').addEventListener('click', async function() {
            const episodeId = document.getElementById('episode-id').value;
            if (!episodeId) {
                alert('Please enter an episode ID');
                return;
            }

            try {
                const response = await axios.get(`/api/episode-stream/${episodeId}`);
                const episodeStream = response.data;
                const episodeInfo = document.getElementById('episode-info');
                episodeInfo.textContent = JSON.stringify(episodeStream, null, 2);

                // Menampilkan data episode
                document.getElementById('episode-data').classList.remove('hidden');
            } catch (error) {
                console.error('Error fetching episode stream:', error);
                alert('Error fetching episode stream');
            }
        });
    </script>
</body>
</html>
