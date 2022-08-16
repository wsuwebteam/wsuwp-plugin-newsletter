import { registerBlockType } from "@wordpress/blocks";

import Edit from "./edit";

registerBlockType( "wsuwp/newsletter-banner", {
    title: "Newsletter Banner",
    icon: "admin-users",
    category: "text",
    attributes: {},
    edit: Edit,
    save: function () {
        return null;
    },
});