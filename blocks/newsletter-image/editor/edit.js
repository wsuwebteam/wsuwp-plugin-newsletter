import { TextControl, TextareaControl, } from "@wordpress/components";
import { useState, useEffect, useRef } from "@wordpress/element";
import { useSelect, useDispatch } from "@wordpress/data";


const {
	useBlockProps,
	RichText,
    InnerBlocks,
	MediaUpload,
	MediaUploadCheck,
	InspectorControls,
	URLInput,
    MediaPlaceholder,
} = wp.blockEditor;

import "./style.scss";


export default function Edit( props ) {

    let {
        attributes,
        setAttributes,
    } = props;

    const blockProps = useBlockProps( {
		className: 'wsu-newsletter-text-wrapper',
		style: {},
	} );
   

    return (
        <div { ...blockProps } >
            <div className="block-newsletter-image-wrapper">
                <div className="block-newsletter-image-frame">
                    <img src={ attributes.imgSrc } />
                    <MediaPlaceholder
                        icon="format-image"
                        labels={{
                            title: 'Upload Image',
                        }}
                        className="block-image"
                        onSelect={ (value) => { 
                            setAttributes( {imgSrc: value.url } );
                            setAttributes( {imgId: value.id } );
                            console.log( value ) 
                        } }
                        accept="image/*"
                        allowedTypes={['image']}
                    />
                </div>
                <div className="block-newsletter-image-content">
                    <TextareaControl
                        label="Image Cation"
                        value={ attributes.imgCaption }
                        onChange={ ( imgCaption ) => setAttributes( { imgCaption } ) }
                    />
                    <TextControl
                        label="Image Credit"
                        value={ attributes.imgCredit }
                        onChange={ ( imgCredit ) => setAttributes( { imgCredit } ) }
                    />
                </div>
            </div>
        </div>
    );
}
