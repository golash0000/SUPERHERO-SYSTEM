// Add new Side Menu here
export const sidebarRoutes = [

    // Head Admin Thingy

    { className: "main", path: "/views/dashboard/head_admin/templates/pages/dashboard.php" },
    { className: "auth-req", path: "/views/dashboard/head_admin/templates/pages/view_authority.html" },
    { className: "account-management", path: "/views/dashboard/head_admin/templates/pages/account_management.php" },
    { className: "document-process", path: "/views/dashboard/head_admin/templates/pages/document_processing.php" },
    { className: "document-records", path: "/views/dashboard/head_admin/templates/pages/document_records.php" },

    //Admin 1

    { className: "admin1-overview", path: "/views/dashboard/head_admin/templates/pages/departments/Admin1/overview.php" },
    { className: "staff-record", path: "/views/dashboard/head_admin/templates/pages/departments/Admin1/staff_records.php" },
    { className: "resident-record", path: "/views/dashboard/head_admin/templates/pages/departments/Admin1/resident_records.php" },
    { className: "e-forms", path: "/views/dashboard/head_admin/templates/pages/departments/Admin1/e-forms.php" },

    //Admin 2

    { className: "main-admin2", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/overview.php" },
    { className: "admin2-view-pending", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/view-pending-request.php" },
    { className: "admin2-view-approval", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/view-pending-approval.php" },

    //BPSO

    { className: "bpso-main", path: "/views/dashboard/head_admin/templates/pages/departments/BPSO/overview.php" },
    { className: "bpso-blotter", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/view-pending-request.php" },
    { className: "bpso-patawag", path: "/views/dashboard/head_admin/templates/pages/departments/Admin2/view-pending-request.php" },

    //BADAC

    { className: "badac-overview", path: "/views/dashboard/head_admin/templates/pages/departments/BADAC/overview.php" },

    //BCPC

    { className: "bcpc-overview", path: "/views/dashboard/head_admin/templates/pages/departments/BCPC/overview.php" },

    //LUPON

    { className: "lupon-overview", path: "/views/dashboard/head_admin/templates/pages/departments/LUPON/overview.php" },

];
