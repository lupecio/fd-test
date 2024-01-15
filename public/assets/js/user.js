async function store() {
    try {
        const elements = document.querySelectorAll("[id^=invalid-]");
        elements.forEach((element) => {
            element.innerHTML = "";
        });

        const response = await fetch("http://localhost:8000/api/users", {
            method: "POST",
            body: JSON.stringify({
                name: document.getElementById("name").value,
                email: document.getElementById("email").value,
                password: document.getElementById("password").value,
                password_confirmation: document.getElementById(
                    "password_confirmation"
                ).value,
            }),
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
        });

        const data = await response.json();

        if (response.ok) {
            document.getElementById("success").innerHTML = data.message;
            setTimeout(() => {
                location.reload();
            }, 2000);
        }

        Object.entries(data.errors).forEach((error) => {
            document.getElementById(`invalid-${error[0]}`).innerHTML =
                error[1][0];
        });
    } catch (e) {
        console.log(e);
    }
}

function checkPasswordConfirmation() {
    const password = document.getElementById("password").value;
    const password_confirmation = document.getElementById(
        "password_confirmation"
    ).value;

    document.getElementById("invalid-password_confirmation").innerHTML = "";

    if (password !== password_confirmation) {
        document.getElementById("invalid-password_confirmation").innerHTML =
            "O campo de senha não coincide com a confirmação.";
    }
}

async function getUsers() {
    try {
        const elements = document.querySelectorAll("[id^=invalid-]");
        elements.forEach((element) => {
            element.innerHTML = "";
        });

        const response = await fetch("http://localhost:8000/api/users", {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
        });

        const { data } = await response.json();

        if (response.ok) {
            data.forEach((user) => {
                const newDate = new Date(user.created_at);

                document.getElementById("table-body").innerHTML += `
                    <tr>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${newDate.getDate()}/${
                    newDate.getMonth() + 1
                }/${newDate.getFullYear()}</td>
                    </tr>
                `;
            });
        }
    } catch (e) {
        console.log(e);
    }
}

getUsers();
