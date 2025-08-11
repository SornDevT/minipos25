<template>
  

</template>

<script>
export default {
  data() {
    return {
      // Define the menu structure as an array of objects
      menuItems: [
        {
          title: 'Dashboards',
          icon: 'bx bx-home-circle',
          link: 'javascript:void(0)',
          children: [
            { title: 'Analytics', link: 'index.html', active: true },
            { title: 'CRM', link: 'dashboards-crm.html' },
            { title: 'eCommerce', link: 'dashboards-ecommerce.html' },
            { title: 'Logistics', link: 'dashboards-logistics.html' },
            { title: 'Academy', link: 'dashboards-academy.html' }
          ]
        },
        {
          title: 'Layouts',
          icon: 'bx bx-layout',
          link: 'javascript:void(0)',
          children: [
            { title: 'Collapsed menu', link: 'layouts-collapsed-menu.html' },
            { title: 'Content navbar', link: 'layouts-content-navbar.html' },
            { title: 'Content nav + Sidebar', link: 'layouts-content-sidebar.html' },
            { title: 'Horizontal', link: 'layouts-horizontal.html' },
            { title: 'Without menu', link: 'layouts-without-menu.html' },
            { title: 'Without navbar', link: 'layouts-without-navbar.html' },
            { title: 'Fluid', link: 'layouts-fluid.html' },
            { title: 'Container', link: 'layouts-container.html' },
            { title: 'Blank', link: 'layouts-blank.html' }
          ]
        },
        {
          title: 'Front Pages',
          icon: 'bx bx-collection',
          link: 'javascript:void(0)',
          children: [
            { title: 'Landing', link: 'front-pages-landing.html' },
            { title: 'Pricing', link: 'front-pages-pricing.html' },
            { title: 'Payment', link: 'front-pages-payment.html' },
            { title: 'Checkout', link: 'front-pages-checkout.html' },
            { title: 'Help Center', link: 'front-pages-help-center.html' }
          ]
        },
        {
          title: 'Apps & Pages',
          icon: 'bx bx-box',
          link: 'javascript:void(0)',
          children: [
            { title: 'Email', link: 'app-email.html' },
            { title: 'Chat', link: 'app-chat.html' },
            { title: 'Calendar', link: 'app-calendar.html' },
            { title: 'Kanban', link: 'app-kanban.html' },
            { title: 'eCommerce', link: 'javascript:void(0)', children: [
              { title: 'Products', link: 'app-ecommerce-product-list.html' },
              { title: 'Order', link: 'app-ecommerce-order-list.html' },
              { title: 'Customer', link: 'app-ecommerce-customer-list.html' },
              { title: 'Manage Reviews', link: 'app-ecommerce-manage-reviews.html' },
              { title: 'Referrals', link: 'app-ecommerce-referrals.html' },
              { title: 'Settings', link: 'app-ecommerce-settings.html' }
            ]},
            { title: 'Academy', link: 'javascript:void(0)', children: [
              { title: 'Dashboard', link: 'app-academy-dashboard.html' },
              { title: 'My Course', link: 'app-academy-my-course.html' },
              { title: 'Course Details', link: 'app-academy-course-details.html' }
            ]},
            { title: 'Logistics', link: 'javascript:void(0)', children: [
              { title: 'Dashboard', link: 'app-logistics-dashboard.html' },
              { title: 'Fleet', link: 'app-logistics-fleet.html' }
            ]},
            { title: 'Invoice', link: 'javascript:void(0)', children: [
              { title: 'List', link: 'app-invoice-list.html' },
              { title: 'Preview', link: 'app-invoice-preview.html' },
              { title: 'Edit', link: 'app-invoice-edit.html' },
              { title: 'Add', link: 'app-invoice-add.html' }
            ]},
            { title: 'Users', link: 'javascript:void(0)', children: [
              { title: 'List', link: 'app-user-list.html' },
              { title: 'View', link: 'javascript:void(0)', children: [
                { title: 'Account', link: 'app-user-view-account.html' },
                { title: 'Security', link: 'app-user-view-security.html' },
                { title: 'Billing & Plans', link: 'app-user-view-billing.html' },
                { title: 'Notifications', link: 'app-user-view-notifications.html' },
                { title: 'Connections', link: 'app-user-view-connections.html' }
              ]}
            ]},
            { title: 'Roles & Permissions', link: 'javascript:void(0)', children: [
              { title: 'Roles', link: 'app-access-roles.html' },
              { title: 'Permission', link: 'app-access-permission.html' }
            ]},
            { title: 'Pages', link: 'javascript:void(0)', children: [
              { title: 'User Profile', link: 'javascript:void(0)', children: [
                { title: 'Profile', link: 'pages-profile-user.html' },
                { title: 'Teams', link: 'pages-profile-teams.html' },
                { title: 'Projects', link: 'pages-profile-projects.html' },
                { title: 'Connections', link: 'pages-profile-connections.html' }
              ]},
              { title: 'Account Settings', link: 'javascript:void(0)', children: [
                { title: 'Account', link: 'pages-account-settings-account.html' },
                { title: 'Security', link: 'pages-account-settings-security.html' },
                { title: 'Billing', link: 'pages-account-settings-billing.html' },
                { title: 'Notifications', link: 'pages-account-settings-notifications.html' },
                { title: 'Connections', link: 'pages-account-settings-connections.html' }
              ]},
              { title: 'FAQ', link: 'pages-faq.html' },
              { title: 'Pricing', link: 'pages-pricing.html' },
              { title: 'Misc', link: 'javascript:void(0)', children: [
                { title: 'Coming Soon', link: 'pages-misc-coming-soon.html' },
                { title: 'Under Maintenance', link: 'pages-misc-under-maintenance.html' },
                { title: 'Page Not Found', link: 'pages-misc-error.html' },
                { title: 'Server Error', link: 'pages-misc-error.html' }
              ]}
            ]},
            { title: 'Authentications', link: 'javascript:void(0)', children: [
              { title: 'Login', link: 'auth-login-basic.html' },
              { title: 'Register', link: 'auth-register-basic.html' },
              { title: 'Verify Email', link: 'auth-verify-email-basic.html' },
              { title: 'Reset Password', link: 'auth-reset-password-basic.html' },
              { title: 'Forgot Password', link: 'auth-forgot-password-basic.html' },
              { title: 'Two Steps', link: 'auth-two-steps-basic.html' }
            ]},
            { title: 'Wizard Examples', link: 'javascript:void(0)', children: [
              { title: 'Checkout', link: 'wizard-ex-checkout.html' },
              { title: 'Property Listing', link: 'wizard-ex-property-listing.html' },
              { title: 'Create Deal', link: 'wizard-ex-create-deal.html' }
            ]},
            { title: 'Modal Examples', link: 'modal-examples.html' }
          ]
        },
        {
          title: 'Components',
          icon: 'bx bx-component',
          link: 'javascript:void(0)',
          children: [
            { title: 'Cards', link: 'javascript:void(0)', children: [
              { title: 'Basic', link: 'cards-basic.html' },
              { title: 'Advance', link: 'cards-advance.html' },
              { title: 'Statistics', link: 'cards-statistics.html' },
              { title: 'Analytics', link: 'cards-analytics.html' },
              { title: 'Gamifications', link: 'cards-gamifications.html' },
              { title: 'Actions', link: 'cards-actions.html' }
            ]},
            { title: 'User interface', link: 'javascript:void(0)', children: [
              { title: 'Accordion', link: 'ui-accordion.html' },
              { title: 'Alerts', link: 'ui-alerts.html' },
              { title: 'Badges', link: 'ui-badges.html' },
              { title: 'Buttons', link: 'ui-buttons.html' },
              { title: 'Carousel', link: 'ui-carousel.html' },
              { title: 'Collapse', link: 'ui-collapse.html' },
              { title: 'Dropdowns', link: 'ui-dropdowns.html' },
              { title: 'Footer', link: 'ui-footer.html' },
              { title: 'List groups', link: 'ui-list-groups.html' },
              { title: 'Modals', link: 'ui-modals.html' },
              { title: 'Navbar', link: 'ui-navbar.html' },
              { title: 'Offcanvas', link: 'ui-offcanvas.html' },
              { title: 'Pagination & Breadcrumbs', link: 'ui-pagination-breadcrumbs.html' },
              { title: 'Progress', link: 'ui-progress.html' },
              { title: 'Spinners', link: 'ui-spinners.html' },
              { title: 'Tabs & Pills', link: 'ui-tabs-pills.html' },
              { title: 'Toasts', link: 'ui-toasts.html' },
              { title: 'Tooltips & Popovers', link: 'ui-tooltips-popovers.html' },
              { title: 'Typography', link: 'ui-typography.html' }
            ]},
            { title: 'Extended UI', link: 'javascript:void(0)', children: [
              { title: 'Avatar', link: 'extended-ui-avatar.html' },
              { title: 'BlockUI', link: 'extended-ui-blockui.html' },
              { title: 'Drag & Drop', link: 'extended-ui-drag-and-drop.html' },
              { title: 'Media player', link: 'extended-ui-media-player.html' },
              { title: 'Perfect Scrollbar', link: 'extended-ui-perfect-scrollbar.html' },
              { title: 'Text Divider', link: 'extended-ui-text-divider.html' },
              { title: 'Timeline', link: 'extended-ui-timeline.html' },
              { title: 'Tour', link: 'extended-ui-tour.html' },
              { title: 'Treeview', link: 'extended-ui-treeview.html' },
              { title: 'Miscellaneous', link: 'extended-ui-miscellaneous.html' }
            ]},
            { title: 'Icons', link: 'javascript:void(0)', children: [
              { title: 'Boxicons', link: 'icons-boxicons.html' },
              { title: 'Font Awesome', link: 'icons-font-awesome.html' }
            ]}
          ]
        },
        {
          title: 'Forms & Tables',
          icon: 'bx bx-food-menu',
          link: 'javascript:void(0)',
          children: [
            { title: 'Form Elements', link: 'javascript:void(0)', children: [
              { title: 'Basic inputs', link: 'forms-basic-inputs.html' },
              { title: 'Input groups', link: 'forms-input-groups.html' },
              { title: 'Custom options', link: 'forms-custom-options.html' },
              { title: 'Editors', link: 'forms-editors.html' },
              { title: 'File upload', link: 'forms-file-upload.html' },
              { title: 'Form layout', link: 'forms-layout.html' }
            ]},
            { title: 'Form Layouts', link: 'javascript:void(0)', children: [
              { title: 'Vertical Form', link: 'form-layouts-vertical.html' },
              { title: 'Horizontal Form', link: 'form-layouts-horizontal.html' },
              { title: 'Sticky Actions', link: 'form-layouts-sticky-actions.html' }
            ]},
            { title: 'Form Wizard', link: 'javascript:void(0)', children: [
              { title: 'Numbered', link: 'form-wizard-numbered.html' },
              { title: 'Icons', link: 'form-wizard-icons.html' }
            ]},
            { title: 'Form Validation', link: 'form-validation.html' },
            { title: 'Tables', link: 'tables-basic.html' },
            { title: 'Datatables', link: 'javascript:void(0)', children: [
              { title: 'Basic', link: 'tables-datatables-basic.html' },
              { title: 'Advanced', link: 'tables-datatables-advanced.html' },
              { title: 'Extensions', link: 'tables-datatables-extensions.html' }
            ]}
          ]
        },
        {
          title: 'Charts & Maps',
          icon: 'bx bx-chart',
          link: 'javascript:void(0)',
          children: [
            { title: 'Charts', link: 'javascript:void(0)', children: [
              { title: 'Apex Charts', link: 'charts-apex.html' },
              { title: 'ChartJS', link: 'charts-chartjs.html' }
            ]},
            { title: 'Leaflet Maps', link: 'maps-leaflet.html' }
          ]
        },
        {
          title: 'Misc',
          icon: 'bx bx-menu',
          link: 'javascript:void(0)',
          children: [
            { title: 'Multi Level', link: 'javascript:void(0)', children: [
              { title: 'Level 2', link: 'javascript:void(0)', children: [
                { title: 'Level 3', link: 'javascript:void(0)' }
              ]}
            ]},
            { title: 'Support', link: 'https://themeselection.com/support/', icon: 'bx bx-support' },
            { title: 'Documentation', link: 'https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/', icon: 'bx bx-file' }
          ]
        }
      ],
      // A state variable to track which submenu is open
      openSubmenu: null,
      // A state variable to handle the mobile menu toggle
      isMobileMenuOpen: false
    };
  },
  methods: {
    /**
     * Toggles the visibility of a submenu.
     * If the clicked menu item is the same as the currently open one, it closes the submenu.
     * Otherwise, it opens the new submenu.
     * @param {Object} menuItem The menu item object that was clicked.
     */
    toggleSubmenu(menuItem) {
      if (menuItem.children) {
        if (this.openSubmenu === menuItem.title) {
          this.openSubmenu = null; // Close the submenu
        } else {
          this.openSubmenu = menuItem.title; // Open the new submenu
        }
      }
    },
    /**
     * Toggles the mobile menu open/closed state.
     */
    toggleMobileMenu() {
      this.isMobileMenuOpen = !this.isMobileMenuOpen;
    }
  }
};
</script>

<style>
/* * This is a basic style to show/hide the menu on mobile.
 * It's based on the original template's behavior.
 */
.menu-mobile-toggler {
  display: none;
}

@media (max-width: 1199.98px) {
  .menu-mobile-toggler {
    display: block !important;
    position: fixed;
    top: 1rem;
    left: 1rem;
    z-index: 1050; /* Ensure it's above other content */
  }

  .layout-menu.menu-vertical {
    left: -280px; /* Hide by default on mobile */
    transition: left 0.3s ease-in-out;
  }

  .layout-menu.menu-vertical.menu-mobile-open {
    left: 0; /* Show the menu */
  }
}
</style>
