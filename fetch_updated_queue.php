<?php
session_start();
require_once("queuing system_connection.php");

$sql = "SELECT accountName, referenceCode FROM queue_logs";
$result = mysqli_query($con, $sql);
$rowNumber = 1;
$previousAccountName = null;
$previousreferenceCode = null;

$html = '<tr>
            <div class="headrow">
                <th class="table-number">No.</th>
                <th class="table-name">Name</th>
                <th class="table-button-release">Action</th>
            </div>
        </tr>';

while ($row = mysqli_fetch_assoc($result)) {
    $currentAccountName = $row["accountName"];
    $currentreferenceCode = $row["referenceCode"];

    if ($currentAccountName !== $previousAccountName || $currentreferenceCode !== $previousreferenceCode) {
        $html .= '<tr>
                    <td>' . $rowNumber . '</td>
                    <td>' . $currentAccountName . '</td>
                    <td>
                        <a href="queuing_release.php?referenceCode=' . $currentreferenceCode . '" class="openRelease">Click to Open</a>
                    </td>
                </tr>';
        $previousAccountName = $currentAccountName;
        $previousreferenceCode = $currentreferenceCode;
        $rowNumber++;
    }
}

echo $html;
?>
