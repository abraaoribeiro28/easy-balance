const ul = document.querySelector("#user-list");
const dropdown = document.querySelector("#dropdown-list-users");
const email = document.querySelector("#email");
const buttonSearch = document.querySelector("#search-user");

buttonSearch.onclick = getUsers;

async function getUsers() {
    dropdown.classList.add("hidden");
    ul.innerHTML = "";

    if (!validateEmail(email.value)) {
        document.querySelector(".box-alerts").innerHTML = alert;
        document.querySelector("#alert-border-2 .text-alert").innerHTML = "Informe um e-mail válido";
        return false;
    }

    activeAnimation();

    const result = await request({ email: email.value });
    
    removeAnimation();

    if (result.length == 0) {
        document.querySelector(".box-alerts").innerHTML = alert;
        document.querySelector("#alert-border-2 .text-alert").innerHTML =
            "Nenhum usuário encontrado";
        return false;
    }

    dropdown.classList.remove("hidden");
    list(result);
}

function validateEmail(email) {
    const regex = /^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/;
    return regex.test(email);
}

function activeAnimation() {
    buttonSearch.setAttribute("disabled", "disabled");
    buttonSearch.classList.add("loading");
}

function removeAnimation() {
    buttonSearch.removeAttribute("disabled");
    buttonSearch.classList.remove("loading");
}

async function request(data) {
    const result = fetch("/transfer/search-users", {
        headers: {
            "Content-type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        method: "POST",
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((json) => json);

    return await result;
}

function list(users) {
    users.forEach((user) => {
        const li = document.createElement("li");
        const button = document.createElement("button");
        const img = document.createElement("img");

        img.setAttribute("src", user.image_path);
        img.setAttribute("class", "mr-3");

        button.setAttribute(
            "class",
            "flex items-center w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
        );
        button.setAttribute("type", "button");
        button.appendChild(img);
        button.innerHTML += user.name;

        li.appendChild(button);
        ul.appendChild(li);
    });
}

const alert = `<div id="alert-border-2"
    class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
    role="alert">
    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"></path>
    </svg>
    <div class="ml-3 text-sm font-medium text-alert">
        
    </div>
    <button type="button"
        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-border-2" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
</div>`;
