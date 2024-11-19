var targetID = '';
var BASE_URL_MENU = `${BASE_URL}/api/desk/management/rolemenu/`;

$(() => {
    const collapseElementList = [].slice.call(document.querySelectorAll('.card-collapsible'));
    collapseElementList.map(function (collapseElement) {
        collapseElement.addEventListener('click', event => {
            event.preventDefault();
            // Collapse the element
            new bootstrap.Collapse(collapseElement.closest('.card').querySelector('.collapse'));
            // Toggle collapsed class in `.card-header` element
            collapseElement.closest('.card-header').classList.toggle('collapsed');
            // Toggle class ti-chevron-down & ti-chevron-right
            Helpers._toggleClass(collapseElement.firstElementChild, 'ti-chevron-down', 'ti-chevron-right');
        });
    });
    var myQueue = new Queue();
    myQueue.enqueue(function (next) {
        comboRole(next);
    }, '1m').enqueue(function (next) {
        listMenu()
    }, 'end').dequeueAll();
});

comboRole = (next) => {
    APP.combov1({
        el: ['#filter_role'],
        url: `${BASE_URL_MENU}combo/role`,
        fild_id: 'id',
        fild_name: 'name',
        // dropdownParent: '#modal-main'
        callback: function (response) {
            next()
        }
    })
}

listMenu = () => {
    var html = '';
    var listMenu = $('#list-menu');
    listMenu.html(html);
    APP.axiosRequest({
        url: `${BASE_URL_MENU}listmenu`,
        data: {
            'role_id': $('#filter_role').val()
        },
    }).then(response => {
        console.log(response)
        html = `
            <div class="col-md">
                <div class="card card-action mb-6">
                    <div class="card-header">
                        <h5 class="card-action-title mb-0">Collapsible Card</h5>
                        <div class="card-action-element">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript:void(0);" class="card-collapsible"><i class="tf-icons ti ti-chevron-down scaleX-n1-rtl ti-sm"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="collapse show">
                        <div class="card-body">
                            <p class="card-text">
                                To create a collapsible card, use <code>.card-collapsible</code> class with action item. To
                                show the collapsible content default use <code>.show</code> class with <code>.collapse</code>.
                            </p>
                            <p class="card-text d-flex align-items-center gap-1">
                                Click on <i class="tf-icons ti ti-chevron-right scaleX-n1-rtl"></i> to see card collapse in
                                action.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        `;
        listMenu.append(html);
    }).catch(error => {
        // console.error("Fetch error:", error);
    });
};