import { registerBlockType } from "@wordpress/blocks";

import Edit from "./edit";

registerBlockType( "wsuwp/newsletter-image", {
    title: "Newsletter Image Section",
    icon: "admin-users",
    category: "text",
    attributes: {
        imgStyle: {
            type: "string",
            default: "",
        },
        imgId: {
            type: "integer",
            default: 0,
        },
        imgSrc: {
            type: "string",
            default: "",
        },
        imgCaption: {
            type: "string",
            default: "",
        },
        imgCredit: {
            type: "string",
            default: "",
        },
    },
    edit: Edit
});