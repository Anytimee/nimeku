import "./bootstrap";
import { useState, useEffect } from "react"; // Hanya mengimpor hook yang dibutuhkan
import ReactDOM from "react-dom/client"; // Tetap perlu mengimpor ReactDOM jika kamu menggunakan React 18+

function AnimeList({ source }) {
    const [animeList, setAnimeList] = useState([]);

    useEffect(() => {
        fetch(`http://localhost:8000/api/anime/${source}/recent`)
            .then((response) => response.json())
            .then((data) => {
                setAnimeList(data);
            })
            .catch((error) => console.error("Error fetching data:", error));
    }, [source]);

    return (
        <div>
            <h1>Anime List</h1>
            <ul>
                {animeList.map((anime, index) => (
                    <li key={index}>{anime.title}</li>
                ))}
            </ul>
        </div>
    );
}

export default AnimeList;

function App() {
    const source = "mySource"; // Ganti dengan sumber data yang sesuai

    return (
        <div className="p-8">
            <h1 className="text-3xl font-bold mb-6">Anime List</h1>
            <AnimeList source={source} />
        </div>
    );
}

const root = ReactDOM.createRoot(document.getElementById("app")); // Pastikan ID 'app' ada di index.blade.php
root.render(<App />);
