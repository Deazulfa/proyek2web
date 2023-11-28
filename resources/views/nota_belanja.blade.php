@extends('layout.main')

@section('content')
    <div class="container mt-5">
        <!-- ... (your existing code) ... -->

        <button type="button" class="btn btn-primary mt-3" onclick="printReceipt()">BAYAR</button>
    </div>

    <script>
        // ... (your existing code) ...

        function printReceipt() {
            // Mendapatkan elemen tbody untuk item
            var itemList = document.getElementById('itemList');
    
            // Mendapatkan semua baris item
            var itemRows = itemList.getElementsByTagName('tr');
    
            // Menyiapkan konten untuk dicetak
            var receiptContent = "<h2>Nota Pembelian</h2><table><thead><tr><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr></thead><tbody>";
    
            // Mengambil data item dari setiap baris dan menambahkannya ke konten
            for (var i = 0; i < itemRows.length; i++) {
                var cells = itemRows[i].getElementsByTagName('td');
                var productName = cells[0].innerHTML;
                var price = cells[1].innerHTML;
                var quantity = cells[2].innerHTML;
                var subtotal = cells[3].innerHTML;
    
                receiptContent += "<tr><td>" + productName + "</td><td>" + price + "</td><td>" + quantity + "</td><td>" + subtotal + "</td></tr>";
            }
    
            receiptContent += "</tbody></table><p>Total: <strong>" + document.getElementById('totalAmount').innerHTML + "</strong></p>";
    
            // Membuka jendela cetak
            var printWindow = window.open('', '_blank');
            printWindow.document.write(receiptContent);
    
            // Menutup penulisan konten
            printWindow.document.close();
    
            // Mencetak
            printWindow.print();
        }
    </script>
@endsection
