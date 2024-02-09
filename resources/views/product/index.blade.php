<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <a href="{{route('products.create')}}" class="btn btn-primary float-end">Add</a>
        <h1 class="my-3">Products</h1>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Category Name</th>
                    <th>Product</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('products.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'category_name',
                    name: 'category_name'
                },
                {
                    data: 'product_name',
                    name: 'product_name',
                    searchable: true
                },

            ],
            paging: true,
            pageLength: 5 
        });

    });
</script>

</html>
