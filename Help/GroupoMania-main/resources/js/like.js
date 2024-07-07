function likePost() {
    const forms = document.querySelectorAll("#forms");

    forms.forEach((form) => {
        form.addEventListener("submit", (e) => {
            e.preventDefault();

            // const url = "/like";
            const token = document.querySelector(
                'meta[name="csrf-token"]'
            ).content;
            const postId = document.querySelector("#postId").value;
            const count = document.querySelector("#count");

            // fetch("{{route('posts.like')}}", {
            //     method: "POST",
            //     headers: {
            //         "Content-Type": "application/json",
            //         "X-CSRF-TOKEN": token,
            //         // "X-CSRF-TOKEN": "{{ csrf_token() }}",
            //     },
            //     body: JSON.stringify({
            //         id: postId,
            //     }), // Replace 1 with the actual post ID
            // })
                // .then((response) => {
                //     if (!response.ok) {
                //         throw new Error("Error liking post1");
                //     }
                //     return response.json();
                // })
                // .then((data) => {
                //     document.querySelector(".like-btn").style.display = "none";
                //     document.querySelector(".unlike-btn").style.display =
                //         "inline";
                //     updateLikeCount(1);
                // })
                // .catch((error) => {
                //     console.error("Error liking post2:", error);
                // });

            fetch("{{route('posts.like')}}", {
                headers: {
                    "Content-Type": "application/json",
                    // 'X-Requested-With': 'XMLHttpRequest',
                    "X-CSRF-TOKEN": token,
                },
                method: "post",
                // body: JSON.stringify({
                //     id: postId,
                // })
                body: JSON.stringify({
                    id: postId,
                })

                .then((response) => {
                    console.log(response);
                })
            });

            // console.log(postId);
        });

        function updateLikeCount(count) {
            const likeCountElement = document.querySelector(".like-count");
            let currentCount = parseInt(likeCountElement.innerText);
            currentCount += count;
            likeCountElement.innerText = currentCount;
        }
    });
}
