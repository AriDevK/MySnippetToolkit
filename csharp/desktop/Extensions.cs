using System.Windows.Forms;

public static class TypeExtensions
{
    public static bool IsEnter(this KeyEventArgs e)
    {
        return e.KeyCode == Keys.Enter;
    }

    public static bool IsTab(this KeyEventArgs e)
    {
        return e.KeyCode == Keys.Tab;
    }

    public static bool IsEmpty(this string value)
    {
        return string.IsNullOrEmpty(value);
    }

    public static int ToInt(this string value)
    {
        return Convert.ToInt32(value);
    }

    public static double ToDouble(this string value)
    {
        return Convert.ToDouble(value);
    }

    public static DateTime ToDateTime(this string value)
    {
        return Convert.ToDateTime(value);
    }

    public static DataTable Sort(this DataTable dt, string column, string direction)
    {
        DataView dv = dt.DefaultView;
        dv.Sort = column + " " + direction;
        return dv.ToTable();
    }

    public static DataTable Filter(this DataTable dt, string filter)
    {
        DataView dv = dt.DefaultView;
        dv.RowFilter = filter;
        return dv.ToTable();
    }

    public static bool IsOk(this DialogResult result)
    {
        return result == DialogResult.OK;
    }

    public static bool IsYes(this DialogResult result)
    {
        return result == DialogResult.Yes;
    }

    public static bool IsNo(this DialogResult result)
    {
        return result == DialogResult.No;
    }

    public static bool IsCancel(this DialogResult result)
    {
        return result == DialogResult.Cancel;
    }

    public static bool IsAbort(this DialogResult result)
    {
        return result == DialogResult.Abort;
    }

    public static bool IsRetry(this DialogResult result)
    {
        return result == DialogResult.Retry;
    }

    public static bool IsIgnore(this DialogResult result)
    {
        return result == DialogResult.Ignore;
    }
}