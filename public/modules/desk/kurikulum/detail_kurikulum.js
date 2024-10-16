onDetailPage = (el) => {
    var data = $(el).data('params')
    data = JSON.parse(atob(data));
    targetID = data['id'];

    $.each(data, (ii, vv) => {
        $(`.detail-${ii}`).html(vv);
    })

    var myQueue = new Queue();
    myQueue.enqueue(function (next) {
        next();
    }, '1m').enqueue(function (next) {
        $('#page-main').fadeOut(500, function () {
            $('#page-detail').fadeIn(500);
            $('#cancelButton').click(function () {
                $('#page-detail').fadeOut(500, function () {
                    $('#page-main').fadeIn(500);
                });
            });
        });
    }, 'end').dequeueAll();

}

// Fungsi untuk mengaktifkan tab yang diklik berdasarkan id
showTab = (clickedTab, tabGroupId = 'tabMainData') => {
    // Ambil semua tab di dalam grup tertentu berdasarkan id
    const tabGroup = document.querySelectorAll(`#${tabGroupId} .nav-link`);
    tabGroup.forEach(tab => tab.classList.remove('active'));

    // Tambahkan kelas 'active' pada tab yang diklik
    clickedTab.classList.add('active');
}
