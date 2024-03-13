<?php


/**
 * Class HtmlTable
 * @package Html\html
 * @version 1.0
 */
class HtmlTable
{
    /**
     * @param array $data
     * @param array|null $actions
     * @param string|null $options
     * @return string
     */
    public static function fromArray(array $data, array $actions = null, string $options = null): string
    {
        $script = "<script>
                    const tbl = (_t) => _t.parentNode.parentNode.parentNode.parentNode;
                    const attr = (_t, _attr) => _t.getAttribute(_attr);
                   </script>";
        $headers = array_keys($data[0]);
        $tableId = substr(md5(rand()), 0, 7);
        $table = "<table id='$tableId' $options>";
        $table .= "<thead>";
        $table .= "<tr>";
        foreach ($headers as $header) {
            $table .= "<th>$header</th>";
        }
        if ($actions != null) {
            $table .= "<th>Actions</th>";
        }
        $table .= "</tr>";
        $table .= "</thead>";
        $table .= "<tbody>";
        $rowNumber = 1;
        foreach ($data as $row) {
            $table .= "<tr>";
            $dataIndex = 0;
            foreach ($row as $cell) {
                $field = $headers[$dataIndex++];
                $table .= "<td id='rw$rowNumber-$field'>$cell</td>";
            }
            if ($actions != null) {
                $table .= "<td>";
                foreach ($actions as $action) {
                    $id = substr(md5(rand()), 0, 7);
                    $auxAction = "<" . $action . " id ='" . $id ."' row=" . $rowNumber . ">";
                    $table .= $auxAction;
                }
                $table .= "</td>";
            }
            $table .= "</tr>";
            $rowNumber++;
        }
        $table .= "</tbody>";
        $table .= "</table>";
        return $script.$table;
    }

/**
     * @param string $caption
     * @param string $onClick
     * @param string|null $cssClass
     * @param string|null $eventAlias
     * @return string
     */
    public static function action(string $caption, string $onClick, string $cssClass = null, string $eventAlias = null): string
    {
        $eventAlias = $eventAlias == null ? "undefined" : $eventAlias;
        $onClick = str_replace("'", "\"", $onClick);
        $onClick = '(function(s, e="' . $eventAlias . '"){' . $onClick . '})(
            {
                id: this.id, 
                row : parseInt(attr(this, "row")),
                data : [...tbl(this).tHead.rows[0].cells].map(h => h.innerText).slice(0, -1).reduce((a, key, i) => {
                    return {...a, [key]: tbl(this).rows[parseInt(attr(this, "row"))].cells[i].innerText}
                }, {})
            })';
        return "input type='button' value='" . $caption . "' class='" . $cssClass . "' onclick='" . $onClick . "'";
    }
}


