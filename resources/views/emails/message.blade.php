<div>
  <table>
    <tr>
      <td width="100"><strong>Prénom</strong></td>

      <td>{{ $messageData->firstName }}</td>
    </tr>
    <tr>
      <td width="100"><strong>Nom</strong></td>
      <td>{{ $messageData->lastName }}</td>
    </tr>
    <tr>
      <td width="100"><strong>Courriel</strong></td>
      <td>{{ $messageData->email }}</td>
    </tr>
    <tr>
      <td width="100"><strong>Téléphone</strong></td>
      <td>{{ $messageData->tel }}</td>
    </tr>
    <tr>
      <td width="100"><strong>Message</strong></td>
      <td>{{ $messageData->message }}</td>
    </tr>
    <tr>
      <td width="100"><strong>Date</strong></td>
      <td>{{ $messageData->updated_at }}</td>
    </tr>
  </table>
</div>
