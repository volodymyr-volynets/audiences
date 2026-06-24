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
DECLARE total_audiences INTEGER;
BEGIN
    SELECT COUNT(au_audience_id)
    INTO total_audiences
    FROM au_audiences
    WHERE au_audience_tenant_id = tenant_id
        AND au_audience_code LIKE code_prefix;

    IF total_audiences = 0 THEN
        RAISE NOTICE 'The number of audiences is zero';
        RETURN;
    END IF;

    RAISE NOTICE 'The number of audiences: %', total_audiences;

<% php %>
    $tables = [
        ['au_contact_audiences', 'au_contaud_tenant_id', 'au_contaud_au_audience_id'],
        ['au_audience_groups', 'au_audgrp_tenant_id', 'au_audgrp_au_audience_id'],
        ['au_audience_organizations', 'au_audorg_tenant_id', 'au_audorg_au_audience_id'],

        ['au_audiences', 'au_audience_tenant_id', 'au_audience_id'],
    ];
<% end php %>

<% foreach ($tables as $k => $v) %>

    DELETE FROM <% string $v[0] %>
    WHERE <% string $v[1] %> = tenant_id
        AND <% string $v[2] %> IN (
            SELECT au_audience_id
            FROM au_audiences
            WHERE au_audience_tenant_id = tenant_id
                AND au_audience_code LIKE code_prefix
        );

<% end foreach %>

END $$;
