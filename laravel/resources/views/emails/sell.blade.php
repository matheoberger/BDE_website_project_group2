<h2>Vous avez été contacté suite à une commande</h2>
<p>De : {{$email}} </p><br><br>
<p>Object : {{$subject}} </p><br><br>
<tr>
    <td> Title </td>
    <td> Price </td>
    <td>Amount </td>
</tr>
<?php foreach ($data as $product) {
    echo "<tr>
    <td> {$product['title']} </td>
    <td> {$product['price']} </td>
    <td> {$product['amount']} </td>
    </tr>";
} ?>