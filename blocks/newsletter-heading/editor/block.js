import { registerBlockType } from "@wordpress/blocks";

import Edit from "./edit";

registerBlockType( "wsuwp/newsletter-heading", {
    title: "Newsletter Heading",
    icon: "admin-users",
    category: "text",
    attributes: {
        heading: {
            type: "string",
            default: "",
          },
    },
    edit: Edit,
    save: function () {
        return null;
    },
});