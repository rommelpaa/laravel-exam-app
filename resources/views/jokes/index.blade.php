<!DOCTYPE html>
<htmL>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body>
        <div class="container md:max-w-[1440px] max-w-full p-6 mx-auto">
        <div class="section">
            <div class="flex flex-col gap-8 p-4">
                <div class="flex w-full flex-row mx-auto border items-center p-8 gap-4">
                    <h1 class="text-3xl">Jokes</h1>
                    <button id="btn-show-random-jokes" class="btn border p-3 rounded cursor-pointer">Show Random Jokes</button>
                </div>
                <div class="content">
                    <h2 class="text-2xl">List of Jokes:</h2>
                    <div class="display-jokes"></div>
                </div>
            </div>
        </div>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function fetchRandomJoke() {
                fetch('/api/jokes')
                        .then(response => response.json())
                        .then(data => {
                            document.querySelector('.display-jokes').innerHTML = '';
                            data.data.forEach(joke => {
                                const jokeElement = document.createElement('div');
                                jokeElement.innerHTML = `
                                    <div class='flex flex-col border p-3 mb-4 align-items-start items-start'>
                                        <div>
                                            <h3 class="text-xl font-bold mb-2">${joke.setup}</h3>
                                        </div>
                                        <div>
                                            <p class='text-lg'>${joke.punchline}</p>
                                        </div>
                                    </div>
                                `;
                                document.querySelector('.display-jokes').appendChild(jokeElement);
                            });
                        });
            }
            
            fetchRandomJoke();

            document.getElementById("btn-show-random-jokes").addEventListener("click", fetchRandomJoke);
        });        
    </script>
</htmL>