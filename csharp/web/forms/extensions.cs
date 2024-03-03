public enum SweetType
{
    Success,
    Error,
    Warning,
    Info
}

public static class SweetAlert
{
    public static void Sweet(this System.Web.UI.Page page, string message, string title = "Success", SweetType type = SweetType.Success)
    {
        if (!page.ClientScript.IsClientScriptBlockRegistered("SweetAlert"))
        {
            page.ClientScript.RegisterClientScriptBlock(page.GetType(), "SweetAlert", "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>");
        }

        page.ClientScript.RegisterStartupScript(page.GetType(), "SweetAlert", $"swal('{title}', '{message}', '{type}')", true);
    }

    public static void Sweet(this System.Web.UI.Page page, string function)
    {
        if (!page.ClientScript.IsClientScriptBlockRegistered("SweetAlert"))
        {
            page.ClientScript.RegisterClientScriptBlock(page.GetType(), "SweetAlert", "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>");
        }

        page.ClientScript.RegisterStartupScript(page.GetType(), "SweetAlert", function, true);
    }
}