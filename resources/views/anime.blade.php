<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Stream</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-8">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">Anime Streaming Links</h1>

        <div class="text-center mb-4">
            <input type="text" id="episode-id" class="p-2 border border-gray-300 rounded" placeholder="Enter Episode ID">
            <button id="fetch-button" class="bg-blue-500 text-white p-2 rounded mt-2">Fetch Streaming Links</button>
        </div>

        <div id="stream-links" class="bg-white p-6 rounded shadow-lg mt-4 hidden">
            <h2 class="text-2xl font-semibold mb-4">Stream Links</h2>
            <ul id="link-list" class="list-disc pl-6"></ul>
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
                const response = await fetch(`/api/anime-stream/${episodeId}`);
                const data = await response.json();

                if (data.error) {
                    alert(data.error);
                    return;
                }

                // Menampilkan link stream
                const linkList = document.getElementById('link-list');
                linkList.innerHTML = `
                    <li>Main Stream: <a href="${data.main}" target="_blank" class="text-blue-500">${data.main}</a></li>
                    <li>Backup Stream: <a href="${data.backup}" target="_blank" class="text-blue-500">${data.backup}</a></li>
                `;

                // Menampilkan data stream
                document.getElementById('stream-links').classList.remove('hidden');
            } catch (error) {
                console.error('Error fetching anime streaming links:', error);
                alert('Error fetching anime streaming links');
            }
        });
    </script>
</body>
</html>
