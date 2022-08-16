import { TextControl } from "@wordpress/components";
import { useState, useEffect, useRef } from "@wordpress/element";
import { useSelect, useDispatch } from "@wordpress/data";
import { Panel, PanelBody, PanelRow } from '@wordpress/components';

const {
	useBlockProps,
	RichText,
    InnerBlocks,
	MediaUpload,
	MediaUploadCheck,
	InspectorControls,
	URLInput,
} = wp.blockEditor;

import "./style.scss";


export default function Edit( props ) {

    let {
        attributes,
        setAttributes,
    } = props;

    const blockProps = useBlockProps( {
		className: 'wsu-newsletter-item-wrapper',
		style: {},
	} );
   

    return (
        <>
        <InspectorControls>
            <PanelBody title="General Options" initialOpen={true} >
                <TextControl
                    label="Item Link"
                    help=""
                    placeholder="https://..."
                    value={attributes.link}
                    onChange={(link) => setAttributes({ link })}
                />   
            </PanelBody>
        </InspectorControls>
        <div { ...blockProps } >
            <h3 className="wsu-newsletter-item__title">
                <TextControl
                    label="Item Title"
                    help=""
                    className={ attributes.link ? 'is-linked' : '' }
                    placeholder="Newsletter item title here ..."
                    value={attributes.title}
                    onChange={(title) => setAttributes({ title })}
                />
            </h3>
            <InnerBlocks
				templateLock={ false }
			/>
        </div>
        </>
    );
}
