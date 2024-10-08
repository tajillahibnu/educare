$(() => {
    $('#main-table').DataTable();
    mainTable();
})

mainTable = () => {
    APP.axiosRequest({
        url: `${BASE_URL}/api/desk/main-table`,
        data: {
            lol: 'zzzz',
            zoom: 'pppppp',
        },
    }).then(data => {
        console.log("Data fetched:", data);
    }).catch(error => {
        console.error("Fetch error:", error);
    });
}