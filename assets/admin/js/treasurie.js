// // let search_by_text = document.getElementById("search_by_text");
// // let my_input = "";
// // search_by_text.addEventListener("input", (e) => {
// //     my_input = e.target.value;
// // });

// // $(document).ready(function () {
// //     $.ajax({
// //         url: url,
// //         type: post,
// //         data: data,
// //         success: function (response) {
// //             $("#search-results").html(response);
// //         },
// //     });
// // });

// $(document).ready(function () {
//     $(document).on("keyup", function (e) {
//         e.preventDefault();
//         let search_by_text = $("#search_by_text").val();
//         // var token_search = $("#token_search").val();
//         // var ajax_search_url = $("#ajax_search_url").val();
//         console.log($("#token_search").val());
//         jQuery.ajax({
//             url: "{{ route('admin.treasuries.ajax_search')}}",
//             type: "POST",
//             dataType: "html",
//             cache: false,
//             data: {
//                 search_by_text: search_by_text,
//                 _token: token_search,
//                 ajax_search_url: ajax_search_url,
//             },
//             success: function (data) {
//                 alert("s");
//                 $("#ajax_responce_serarchDiv").html(data);
//             },
//             error: function (xhr, ajaxOptions, thrownError) {
//                 alert(xhr.status);
//                 alert(thrownError);
//             },
//         });
//     });
//     // const newLocal = $(document).on(
//     //     "click",
//     //     "#ajax_pagination_in_search a ",
//     //     function (e) {
//     //         e.preventDefault();
//     //         var search_by_text = $("#search_by_text").val();
//     //         var url = $(this).attr("href");
//     //         var token_search = $("#token_search").val();
//     //         jQuery.ajax({
//     //             url: url,
//     //             type: "post",
//     //             dataType: "html",
//     //             cache: false,
//     //             data: {
//     //                 search_by_text: search_by_text,
//     //                 _token: token_search,
//     //             },
//     //             success: function (data) {
//     //                 $("#ajax_responce_serarchDiv").html(data);
//     //             },
//     //             error: function () {},
//     //         });
//     //     }
//     // );
// });
$(document).ready(function () {
    $(document).on("input", () => {
        let search_by_name = $("#search_by_name").val();
        let token_search = $("#token_search").val();
        let ajax_search_url = $("#ajax_search_url").val();
        jQuery.ajax({
            url: ajax_search_url,
            type: "post",
            datatype: "html",
            cache: false,
            data: {
                search_by_name: search_by_name,
                _token: token_search,
            },
            success: (data) => {
                $("#ajax_responce_serarchDiv").html(data);
            },
            error: () => {},
        });
    });

    $(document).on("click", "#ajax_pagination_in_search a", function (e) {
        e.preventDefault();
        var search_by_name = $("#search_by_name").val();
        var href = $(this).attr("href");
        var token_search = $("#token_search").val();
        $.ajax({
            url: href,
            type: "post",
            dataType: "html",
            cache: false,
            data: {
                search_by_name: search_by_name,
                _token: token_search,
            },
            success: function (data) {
                $("#ajax_responce_serarchDiv").html(data);
            },
            error: function () {},
        });
    });
});
