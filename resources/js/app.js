import "./bootstrap";

// import 'bootstrap/dist/css/bootstrap.min.css';

window.addEventListener("load", function () {
    // Script Preloader
    var preloader = document.getElementById("preloader");
    preloader.style.display = "none";
});


// function currentTime() {
//     setInterval(() => {
//         let date = new Date();

//         let datePerso = date.toLocaleString("fr-FR", {
//             weekday: "short",
//             day: "numeric",
//             month: "short",
//             year: "2-digit",
//             hour: "numeric",
//             minute: "numeric",
//             second: "numeric",
//         });
//         document.getElementById("current-time").innerHTML = datePerso;
//     }, 1);
// }

// currentTime();

// function addRoleFunction() {
//     document
//         .getElementById("AddRoleForm")
//         .addEventListener("submit", function (event) {
//             e.preventDefault();
//             const url = "{{ route('roles.store') }}";

//             const token = document.querySelector(
//                 'meta[name="csrf-token"]'
//             ).content;

//             const name = document.getElementById("name").value;
//             fetch(url, {
//                 method: "POST",
//                 headers: {
//                     accept: "application/json",
//                     "X-CSRF-TOKEN": token,
//                     // "X-CSRF-TOKEN": "{{ csrf_token() }}",
//                 },
//                 body: JSON.stringify({
//                     name: name,
//                 }), // Replace 1 with the actual post ID
//             })
//                 .then((response) => {
//                     if (!response.ok) {
//                         throw new Error("Error server response: " + response);
//                     }

//                     return response.json();
//                 })
//                 .then((data) => {
//                     console.log("Happy");
//                 })
//                 .catch((error) => {
//                     console.error("Error server response: :" + error);
//                 });
//         });
// }

// const url = "{{route('users')}}";

// const token = document.querySelector(
//     'meta[name="csrf-token"]'
// ).content;

// fetch(url, {
//     method: "POST",
//     headers: {
//         accept: "application/json",
//         "X-CSRF-TOKEN": token,
//     },
//     body: JSON.stringify({
//         type: 1,
//         // value: value,
//     }),
// })
//     .then((response) => {
//         if (response.ok) {
//             throw new Error("Error servers response: " + response);
//         }

//         return response.json();
//     })

//     .then((data) => {
    
//         console.log(data);
//     })
//     .catch((error) => {
//         console.error("Error server response: :" + error);
//     });
