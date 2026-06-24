<% php %>
    $__generated_options = \SQL2::validate([
        'tenant_id' => ['required' => true, 'domain' => 'tenant_id'],
        'code_prefix' => ['required' => true, 'domain' => 'code'],
    ], $__generated_options);
    extract($__generated_options, EXTR_OVERWRITE);
<% end php %>

DO $$
DECLARE tenant_id INTEGER = <% int $tenant_id %>;
DECLARE code_prefix VARCHAR = '<% string $code_prefix %>';
DECLARE total_contacts INTEGER;
BEGIN
    SELECT COUNT(au_contact_id)
    INTO total_contacts
    FROM au_contacts
    WHERE au_contact_tenant_id = tenant_id
        AND au_contact_code LIKE code_prefix;

    IF total_contacts = 0 THEN
        RAISE NOTICE 'The number of contacts is zero';
        RETURN;
    END IF;

    RAISE NOTICE 'The number of contacts: %', total_contacts;

<% php %>
    $tables = [
        ['au_contact_audiences', 'au_contaud_tenant_id', 'au_contaud_au_contact_id'],
        ['au_contact_groups', 'au_contgrp_tenant_id', 'au_contgrp_au_contact_id'],
        ['au_contact_languages', 'au_contsplang_tenant_id', 'au_contsplang_au_contact_id'],
        ['au_contact_organizations', 'au_contorg_tenant_id', 'au_contorg_au_contact_id'],
        ['au_contact_piis', 'au_contpii_tenant_id', 'au_contpii_au_contact_id'],
        ['au_contact_skills', 'au_contskill_tenant_id', 'au_contskill_au_contact_id'],

        ['au_contacts__addresses__attributes', 'wg_attribute_tenant_id', 'wg_attribute_au_contact_id'],
        ['au_contacts__addresses', 'wg_address_tenant_id', 'wg_address_au_contact_id'],
        ['au_contacts__attributes', 'wg_attribute_tenant_id', 'wg_attribute_au_contact_id'],
        ['au_contacts__comments', 'wg_comment_tenant_id', 'wg_comment_au_contact_id'],
        ['au_contacts__documents', 'wg_document_tenant_id', 'wg_document_au_contact_id'],
        ['au_contacts__tags', 'wg_tag_tenant_id', 'wg_tag_au_contact_id'],

        ['au_contacts', 'au_contact_tenant_id', 'au_contact_id'],
    ];
<% end php %>

<% foreach ($tables as $k => $v) %>

    DELETE FROM <% string $v[0] %>
    WHERE <% string $v[1] %> = tenant_id
        AND <% string $v[2] %> IN (
            SELECT au_contact_id
            FROM au_contacts
            WHERE au_contact_tenant_id = tenant_id
                AND au_contact_code LIKE code_prefix
        );

<% end foreach %>

END $$;
