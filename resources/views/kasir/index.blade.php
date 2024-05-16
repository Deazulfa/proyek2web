@extends('layout.main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Kasir</h2>

        <form id="pointOfSaleForm" enctype="multipart/form-data" method="POST" action="{{ route('index-pesanan') }}">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nama Produk:</label>
                <select id="select-field" class="form-control select2">
                    <option value="" selected disabled>Pilih Produk</option>
                    @foreach ($product as $item)
                        <option value="{{ $item->id }}"
                            {{ old('product_id', @$kasir->product_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_produk }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga:</label>
                <input type="number" class="form-control" id="price" readonly>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah Pesanan:</label>
                <input type="number" class="form-control" id="quantity" value="1" required>
            </div>

            <button type="button" class="btn btn-success" onclick="addItem()">Tambahkan Item</button>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody id="itemList">
                    <!-- Daftar item akan ditampilkan di sini -->
                </tbody>
            </table>

            <div id="total" class="mt-3">
                <strong>Total:</strong> <span id="totalAmount">0</span>
            </div>

            <button type="submit" class="btn btn-primary mt-3">BAYAR</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function updateTotal() {
            let total = 0;
            const productId = $(this).data('product_id');
            const jumlah = $(this).data('jumlah');
            const subtotal = $(this).data('subtotal');
            $('#itemList tr').each(function() {
                const subtotal = parseFloat($(this).find('td:last').text());
                total += subtotal;
            });

            $('#totalAmount').text(total);
        }

        // Define addItem globally
        function addItem() {
            const productName = $('#select-field option:selected').text();
            const productVal = $('#select-field option:selected').val();
            const price = Number($('#price').val());
            const quantity = Number($('#quantity').val());

            const subtotal = price * quantity;

            // Create a new row and append it to the tbody with data attributes
            const newRow = `
        <tr>
            <td>${productName}</td>
            <td>${price}</td>
            <td>${quantity}</td>
            <td>${subtotal}</td>
            <input type="hidden" name="product_id[]" value="${productVal}">
            <input type="hidden" name="jumlah[]" value="${quantity}">
            <input type="hidden" name="subtotal[]" value="${subtotal}">
        </tr>`;
        
            $('#itemList').append(newRow);

            // Update the total
            updateTotal();
        }

        $(document).ready(function() {
            $('#select-field').change(function() {
                var selectedProductId = $(this).val();
                console.log(selectedProductId);
                if (selectedProductId) {
                    $.ajax({
                        url: '{{ url('kasir/get-produk-id') }}/' + selectedProductId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            if (data && data.harga_jual !== undefined) {
                                $('#price').val(data.harga_jual);
                            } else {
                                alert('Harga produk tidak ditemukan.');
                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat mengambil harga produk.');
                        }
                    });
                } else {
                    // Jika tidak ada produk yang dipilih, reset nilai input harga
                    $('#price').val('');
                }
            });



            function updateTotal() {
                let total = 0;

                $('#itemList tr').each(function() {
                    const subtotal = parseFloat($(this).find('td:last').text());
                    total += subtotal;
                });

                $('#totalAmount').text(total);
            }

            function printReceipt() {
                // Your logic for printing the receipt
                alert('Proses pembayaran...');
            }

            function displayError(message) {
                alert(message);
            }

            function resetPrice() {
                $('#price').val('');
            }

            // Other parts of your code...

            // Example: Handle button click event for adding an item
            $('#addItemButton').click(function() {
                addItem();
            });

            // Example: Handle button click event for payment
            $('#payButton').click(function() {
                printReceipt();
            });
        });
    </script>

    <script>
        function calculateTotal() {
            var totalAmount = 0;
            var itemRows = document.getElementById('itemList').getElementsByTagName('tr');

            for (var i = 0; i < itemRows.length; i++) {
                var cells = itemRows[i].getElementsByTagName('td');
                var subtotal = parseFloat(cells[3].innerHTML);
                totalAmount += subtotal;
            }

            // Menampilkan total
            document.getElementById('totalAmount').innerHTML = totalAmount;
        }

        function printReceipt() {
            // (Sama seperti sebelumnya)
        }
    </script>
@endsection
