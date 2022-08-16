import { registerBlockType } from "@wordpress/blocks";

import Edit from "./edit";
import save from './save';

registerBlockType( "wsuwp/newsletter-text", {
    title: "Newsletter Text section",
    icon: "admin-users",
    category: "text",
    attributes: {
    },
    edit: Edit,
    save: save,
});