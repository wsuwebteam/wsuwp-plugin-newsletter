import { registerBlockType } from "@wordpress/blocks";

import Edit from "./edit";
import save from "./save";

registerBlockType( "wsuwp/newsletter-item", {
    title: "Newsletter Item",
    icon: "admin-users",
    category: "text",
    attributes: {
        title: {
            type: "string",
            default: "",
        },
        link: {
            type: "string",
            default: "",
        },
    },
    edit: Edit,
    save,
});