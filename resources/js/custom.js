$(document).ready(function (){

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault()
        const page = $(this).attr('href').split('page=')[1]

        manipulateTable(page, true)
    })

    $(document).on('change', '.page_limit', function (event) {
        event.preventDefault()

        window.perPage = $(this).val()

        manipulateTable(1, true)
    })
})
