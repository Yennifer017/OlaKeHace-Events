<?php class ReportDB
{
    public function addReport(Report $report, $conn)
    {
        $sql = 'CALL add_report(:id_publication, :reason, :details);';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_publication', $report->getIdPublication());
        $stmt->bindValue(':reason', $report->getReason());

        $stmt->bindValue(':details', $report->getDetails());

        if ($stmt->execute()) {
            //good job!
        } else {
            throw new InvalidDataEx("Datos inválidos");
        }
    }

}