import { registerBlockType } from "@wordpress/blocks";

import Edit from "./edit";

registerBlockType( "wsuwp/newsletter-date", {
    title: "Newsletter Date",
    icon: "admin-users",
    category: "text",
    attributes: {
        date: {
            type: "string",
            default: "",
          },
    },
    edit: Edit,
    save: function () {
        return null;
    },
});